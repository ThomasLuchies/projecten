package Chess.Core.StateAnalysers;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Field;
import Chess.Core.State;
import Chess.Core.Usecases.IsChecked.*;
import Chess.Core.Usecases.LocateKing.LocateKing;

/**
 * Determines if the a king is in check based on the given board and color.
 * If there is no check found on the board the current state will be returned.
 *
 * @author Sydney Minnaar
 * @author Thomas Luchies
 * @version 0.1
 */
public class CheckAnalyser implements StateAnalyser
{
    @Override
    public State analyse(State current, Board board, Color turn) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var isCheckedByBischopOrQueen = new IsCheckedByBischopOrQueen();
        var isCheckedByKnight = new IsCheckedByKnight();
        var isCheckedByRookOrQueen = new IsCheckedByRookOrQueen();
        var isCheckedByPawn = switch (turn)
        {
            case white -> new IsCheckedByBlackPawn();
            case black -> new IsCheckedByWhitePawn();
        };
        var checkedByBischopOrQueen = isCheckedByBischopOrQueen.execute(board, turn);
        var checkedByKnight = isCheckedByKnight.execute(board, turn);
        var checkedByRookOrQueen = isCheckedByRookOrQueen.execute(board, turn);
        var checkedByPawn = isCheckedByPawn.execute(board, turn);
        if (checkedByBischopOrQueen || checkedByKnight || checkedByRookOrQueen || checkedByPawn)
            return State.check;
        return State.active;
    }
}