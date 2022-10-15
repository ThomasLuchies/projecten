package Chess.Core.StateAnalysers;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Field;
import Chess.Core.State;
import Chess.Core.Usecases.LocateKing.LocateKing;

/**
 * Used for analysing the state of the board.
 *
 * @author Sydney Minnaar
 * @author Thomas Luchies
 * @version 0.1
 */
public interface StateAnalyser
{
    State analyse(State current, Board board, Color turn) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound;
}