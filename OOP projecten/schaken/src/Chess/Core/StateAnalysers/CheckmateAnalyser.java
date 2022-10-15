package Chess.Core.StateAnalysers;

import Chess.Core.*;
import Chess.Core.Usecases.LocateKing.LocateKing;
import Chess.Core.Utilities.ListAvailableMovesByColor;

/**
 * Determines if the king with the specified color is checkmated.
 * If there is no checkmate found on the board the current state will be returned.
 *
 * @author Sydney Minnaar
 * @author Thomas Luchies
 * @version 0.1
 */
public class CheckmateAnalyser implements StateAnalyser
{
    @Override
    public State analyse(State current, Board board, Color turn) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var checkAnalyser = new CheckAnalyser();
        var checkAnalyseState = checkAnalyser.analyse(current, board, turn);
        if (checkAnalyseState != State.check)
            return checkAnalyseState;
        var listMoves = new ListAvailableMovesByColor();
        var moves = listMoves.list(current, board, turn);
        if (moves.isEmpty())
            return State.checkmate;
        return current;
    }
}